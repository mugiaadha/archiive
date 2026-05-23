package aplikasicrud.api.controller;

import aplikasicrud.api.entities.Barang;
import aplikasicrud.api.model.*;
import aplikasicrud.api.services.BarangService;
import aplikasicrud.api.services.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.MediaType;
import org.springframework.web.bind.annotation.*;

import java.util.Collection;
import java.util.List;

@RestController
public class UserController {
    @Autowired
    private UserService userService;

    @Autowired
    private BarangService barangService;

    @CrossOrigin(origins = "http://localhost:4200")
    @PostMapping(
            path = "/api/users",
            consumes = MediaType.APPLICATION_JSON_VALUE,
            produces = MediaType.APPLICATION_JSON_VALUE
    )
    public WebResponse<String> register(@RequestBody RegisterUserRequest request) {
        userService.addUser(request);
        return WebResponse.<String>builder().data("OK").build();
    }

    @CrossOrigin(origins = "http://localhost:4200")
    @GetMapping("/api/users")
    public WebResponse<List<UserResponse>> getAllUsers() {
        return WebResponse.<List<UserResponse>>builder().data(userService.getAllUsers()).build();
    }

    @CrossOrigin(origins = "http://localhost:4200")
    @GetMapping("/api/users/{id}")
    public WebResponse<UserResponse> findUserById(
            @PathVariable String id
    ) {
        return WebResponse.<UserResponse>builder().data(userService.findById(id)).build();
    }

    @CrossOrigin(origins = "http://localhost:4200")
    @PutMapping("/api/users/{id}")
    public WebResponse<String> editUser(
            @PathVariable Integer id,
            @RequestBody EditUserRequest request
    ) {
        userService.editUser(id, request);
        return WebResponse.<String>builder().data("OK").build();
    }

    @CrossOrigin(origins = "http://localhost:4200")
    @DeleteMapping("/api/users/{id}")
    public WebResponse<String> deleteUser(
            @PathVariable Integer id
    ) {
        userService.deleteUser(id);
        return WebResponse.<String>builder().data("OK").build();
    }

    @CrossOrigin(origins = "http://localhost:4200")
    @GetMapping("/test/users/{id}")
    public WebResponse<Collection<UserResponseTest>> testFindUserByIds(
            @PathVariable Integer id
    ) {
        return WebResponse.<Collection<UserResponseTest>>builder().data(userService.findUserById(id)).build();
    }

    @CrossOrigin(origins = "http://localhost:4200")
    @GetMapping("/test/tax")
    public WebResponse<Double> testFindUserByIds() {
        return WebResponse.<Double>builder().data(userService.calculationTax()).build();
    }
}
