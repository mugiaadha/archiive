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
public class BarangController {
    @Autowired
    private BarangService barangService;

    @GetMapping(path = "/barang")
    public WebResponse<List<Barang>> getAllBarang() {
        List<Barang> barang = barangService.getAllBarang();
        return WebResponse.<List<Barang>>builder().data(barang).build();
    }

    @PostMapping(path = "/barang")
    public WebResponse<List<Barang>> createBarang(@RequestBody AddBarangRequest request) {
        List<Barang> barang = barangService.createBarang(request);
        return WebResponse.<List<Barang>>builder().data(barang).build();
    }
}
