package cl.duoc.descubretusede.model;

import java.sql.Date;

/**
 * Created by kurt on 13-10-2014.
 */
public class Foto {
    private int idFoto;
    private String fotoSala;
    private Date fechaFoto;

    public Foto() {
    }


    public int getIdFoto() {
        return idFoto;
    }

    public void setIdFoto(int idFoto) {
        this.idFoto = idFoto;
    }

    public String getFotoSala() {
        return fotoSala;
    }

    public void setFotoSala(String fotoSala) {
        this.fotoSala = fotoSala;
    }

    public Date getFechaFoto() {
        return fechaFoto;
    }

    public void setFechaFoto(Date fechaFoto) {
        this.fechaFoto = fechaFoto;
    }
}
