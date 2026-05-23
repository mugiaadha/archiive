package braveprogrammerapp.braveprogrammer;

import braveprogrammerapp.braveprogrammer.services.CalculateAverageService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;


@RestController
public class WebController {

    @Autowired
    private CalculateAverageService calculateAverageService;

    @GetMapping("/calculate-victim")
    public Double averageVictim() {
        return calculateAverageService.calculateAverageVictim();
    }
}
