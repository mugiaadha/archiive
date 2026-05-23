package aplikasicrud.api.services;

import aplikasicrud.api.entities.User;
import aplikasicrud.api.model.EditUserRequest;
import aplikasicrud.api.model.RegisterUserRequest;
import aplikasicrud.api.model.UserResponse;
import aplikasicrud.api.model.UserResponseTest;
import aplikasicrud.api.repository.UserRepository;
import aplikasicrud.api.security.BCrypt;
import jakarta.validation.ConstraintViolation;
import jakarta.validation.ConstraintViolationException;
import jakarta.validation.Validator;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;
import org.springframework.web.server.ResponseStatusException;

import java.util.Collection;
import java.util.List;
import java.util.Set;

@Service
public class UserService {

    @Autowired
    private UserRepository userRepository;

    @Autowired
    private Validator validator;

    @Transactional
    public void addUser(RegisterUserRequest request) {
        Set<ConstraintViolation<RegisterUserRequest>> constraintViolations = validator.validate(request);
        if (!constraintViolations.isEmpty()) {
            throw new ConstraintViolationException(constraintViolations);
        }

        if (userRepository.existsByUsername(request.getUsername()).equals(Boolean.TRUE)) {
            throw new ResponseStatusException(HttpStatus.BAD_REQUEST, "username already registered");
        }

        User user = new User();
        user.setUsername(request.getUsername());
        user.setPassword(BCrypt.hashpw(request.getPassword(), BCrypt.gensalt()));
        user.setName(request.getName());

        userRepository.save(user);
    }

    @Transactional
    public void editUser(Integer id, EditUserRequest request) {
        Set<ConstraintViolation<EditUserRequest>> constraintViolations = validator.validate(request);
        if (!constraintViolations.isEmpty()) {
            throw new ConstraintViolationException(constraintViolations);
        }

        if (!userRepository.existsById(id.toString())) {
            throw new ResponseStatusException(HttpStatus.BAD_REQUEST, "user not found");
        }

        User user = userRepository.findById(id.toString())
                .stream()
                .findFirst()
                .orElseThrow();

        user.setPassword(BCrypt.hashpw(request.getPassword(), BCrypt.gensalt()));
        user.setName(request.getName());

        userRepository.save(user);
    }


    @Transactional
    public void deleteUser(Integer id) {
        if (!userRepository.existsById(id.toString())) {
            throw new ResponseStatusException(HttpStatus.BAD_REQUEST, "user not found");
        }

        User user = userRepository.findById(id.toString())
                .stream()
                .findFirst()
                .orElseThrow();


        userRepository.delete(user);
    }

    public List<UserResponse> getAllUsers() {
        return userRepository.findAll()
                .stream()
                .map(
                        user -> new UserResponse(
                                user.getId(),
                                user.getUsername(),
                                user.getName()
                        )
                )
                .toList();
    }

    public UserResponse findById(String id) {
        User user = userRepository.findById(id)
                .stream()
                .findFirst()
                .orElseThrow();

        return new UserResponse(
                user.getId(),
                user.getUsername(),
                user.getName()
        );
    }

    public Collection<UserResponseTest> findUserById(Integer id) {
        return userRepository.findAllActiveUsers(id);
    }



    public Double calculationTax() {
        Integer jumlahMobil = 0;
        Integer jumlahMotor = 0;
        Long pkbMotor = 300_000L;
        Long pkbMobil = 1_000_000L;
        Double nilaiPajakMotor = (double) (((pkbMotor / 2L) * 100) * (2 / 100));

        return nilaiPajakMotor;
    }


}
