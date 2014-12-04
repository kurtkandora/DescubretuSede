package cl.duoc.descubretusede.model;

import java.sql.Date;

/**
 * Created by kurt on 14-10-2014.
 */
public class Afiche {
    private int idAfiche;
    private int idActividad;
    private String afiche;
    private Date fechaPublicacion;

    public Afiche() {
    }

    public int getIdActividad() {
        return idActividad;
    }

    public void setIdActividad(int idActividad) {
        this.idActividad = idActividad;
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
