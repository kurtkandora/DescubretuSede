package cl.duoc.descubretusede.model;

/**
 * Created by kurt on 14-10-2014.
 */
public class Notificacion {

    private String notificacion;
    private int idNotificacion;

    public Notificacion() {
    }

    public Notificacion(String notificacion, int idNotificacion, int idActividad) {
        this.notificacion = notificacion;
        this.idNotificacion = idNotificacion;
    }

    public String getNotificacion() {
        return notificacion;
    }

    public void setNotificacion(String notificacion) {
        this.notificacion = notificacion;
    }

    public int getIdNotificacion() {
        return idNotificacion;
    }

    public void setIdNotificacion(int idNotificacion) {
        this.idNotificacion = idNotificacion;
    }
}
