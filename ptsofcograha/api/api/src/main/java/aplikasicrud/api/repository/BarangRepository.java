package aplikasicrud.api.repository;

import aplikasicrud.api.entities.Barang;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface BarangRepository extends JpaRepository<Barang, String> {
}
