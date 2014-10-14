package cl.duoc.descubretusede.model;

import java.sql.Date;

/**
 * Created by kurt on 14-10-2014.
 */
public class Afiche {
    private int idAfiche;
    private String afiche;
    private Date fechaPublicacion;

    public Afiche() {
    }

    public Afiche(int idAfiche, String afiche, Date fechaPublicacion) {
        this.idAfiche = idAfiche;
        this.afiche = afiche;
        this.fechaPublicacion = fechaPublicacion;
    }

    public int getIdAfiche() {
        return idAfiche;
    }

    public void setIdAfiche(int idAfiche) {
        this.idAfiche = idAfiche;
    }

    public String getAfiche() {
        return afiche;
    }

    public void setAfiche(String afiche) {
        this.afiche = afiche;
    }

    public Date getFechaPublicacion() {
        return fechaPublicacion;
    }

    public void setFechaPublicacion(Date fechaPublicacion) {
        this.fechaPublicacion = fechaPublicacion;
    }
}
