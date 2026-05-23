package aplikasicrud.api.model;

import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.Size;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@AllArgsConstructor
@NoArgsConstructor
@Builder
public class AddBarangRequest {
    @NotBlank
    @Size(max = 100)
    private String kode;

    @NotBlank
    @Size(max = 100)
    private String nama;

    @NotBlank
    @Size(max = 100)
    private String kuantiti;
}
