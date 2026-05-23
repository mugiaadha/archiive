package aplikasicrud.api.repository;

import aplikasicrud.api.entities.User;
import aplikasicrud.api.model.UserResponseTest;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;

import java.util.Collection;

@Repository
public interface UserRepository extends JpaRepository<User, String> {
    Boolean existsByUsername(String username);

    @Query("""
            SELECT
                new aplikasicrud.api.model.UserResponseTest(user.id, em.contactName)
            FROM
                User user
            JOIN EmergencyContact em on em.userId = user.id
            WHERE user.id = :id
            GROUP BY user.id
            """
    )
    Collection<UserResponseTest> findAllActiveUsers(Integer id);
}
