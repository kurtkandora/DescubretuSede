package cl.duoc.descubretusede.model;

/**
 * Created by kurt on 14-10-2014.
 */
public class Notificacion {

    private String notificacion, tipo;
    private int idNotificacion;

    public Notificacion() {
    }

    public Notificacion(String notificacion, String tipo, int idNotificacion) {
        this.notificacion = notificacion;
        this.tipo = tipo;
        this.idNotificacion = idNotificacion;
    }

    public String getNotificacion() {
        return notificacion;
    }

    public void setNotificacion(String notificacion) {
        this.notificacion = notificacion;
    }

    public String getTipo() {
        return tipo;
    }

    public void setTipo(String tipo) {
        this.tipo = tipo;
    }

    public int getIdNotificacion() {
        return idNotificacion;
    }

    public void setIdNotificacion(int idNotificacion) {
        this.idNotificacion = idNotificacion;
    }
}
