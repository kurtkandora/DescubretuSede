package cl.duoc.descubretusede.model;

/**
 * Created by kurt on 13-10-2014.
 */
public class Sala {
    private int idSala, capacidad;
    private String nombreSala, ubicacionSala;
    private Foto fotoSala;

    public Sala() {
    }

    public Sala(int idSala, int capacidad, String nombreSala, String ubicacionSala, Foto fotoSala) {
        this.idSala = idSala;
        this.capacidad = capacidad;
        this.nombreSala = nombreSala;
        this.ubicacionSala = ubicacionSala;
        this.fotoSala = fotoSala;
    }

    public int getIdSala() {
        return idSala;
    }

    public void setIdSala(int idSala) {
        this.idSala = idSala;
    }

    public int getCapacidad() {
        return capacidad;
    }

    public void setCapacidad(int capacidad) {
        this.capacidad = capacidad;
    }

    public String getNombreSala() {
        return nombreSala;
    }

    public void setNombreSala(String nombreSala) {
        this.nombreSala = nombreSala;
    }

    public String getUbicacionSala() {
        return ubicacionSala;
    }

    public void setUbicacionSala(String ubicacionSala) {
        this.ubicacionSala = ubicacionSala;
    }

    public Foto getFotoSala() {
        return fotoSala;
    }

    public void setFotoSala(Foto fotoSala) {
        this.fotoSala = fotoSala;
    }
}
