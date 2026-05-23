package aplikasicrud.api.entities;

import jakarta.persistence.*;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
@Entity
@Table(name = "barang")
public class Barang {
    @Id
    @GeneratedValue(strategy = GenerationType.UUID)
    private String id;

    private String kode;

    private String nama;

    private String kuantiti;
}
