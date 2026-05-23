package braveprogrammerapp.braveprogrammer.model.entity;

public class Victim{
    private Integer ageAtDeath;
    private Integer yearOfDeath;

    public Integer getAgeAtDeath(){
        return ageAtDeath;
    }
    public void setName(Integer ageAtDeath){
        this.ageAtDeath = ageAtDeath;
    }

    public Integer getYearOfDeath(){
        return yearOfDeath;
    }
    public void setYearOfDeath(Integer yearOfDeath){
        this.yearOfDeath = yearOfDeath;
    }
}
