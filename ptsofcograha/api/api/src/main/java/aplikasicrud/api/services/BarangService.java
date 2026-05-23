package aplikasicrud.api.services;

import aplikasicrud.api.entities.Barang;
import aplikasicrud.api.model.AddBarangRequest;
import aplikasicrud.api.repository.BarangRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class BarangService {
    @Autowired
    private BarangRepository barangRepository;

    public List<Barang> getAllBarang() {
        return barangRepository.findAll();
    }

    public void createBarang(AddBarangRequest request) {
        Barang barang =
                if (barang.isActive ==) {
                   throw RuntimeException("eror partner")
                }
        return barangRepository.findAll();
    }
}
