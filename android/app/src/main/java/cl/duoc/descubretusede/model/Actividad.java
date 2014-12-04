package cl.duoc.descubretusede.model;

import java.sql.Date;
import java.sql.Time;
import java.util.ArrayList;

/**
 * Created by kurt on 13-10-2014.
 */
public class Actividad {
    private int idActividad;
    private String nombre, descripcion, ubicacion, tipo;
    private Time horainicio,horaTermino;
    private Date fecha;
    private ArrayList<Notificacion> notificaciones;
    private Afiche afiche;

    public Actividad() {
    }

    public Time getHoraTermino() {
        return horaTermino;
    }

    public void setHoraTermino(Time horaTermino) {
        this.horaTermino = horaTermino;
    }

    public Afiche getAfiche() {
        return afiche;
    }

    public void setAfiche(Afiche afiche) {
        this.afiche = afiche;
    }

    public int getIdActividad() {
        return idActividad;
    }

    public void setIdActividad(int idActividad) {
        this.idActividad = idActividad;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public String getUbicacion() {
        return ubicacion;
    }

    public void setUbicacion(String ubicacion) {
        this.ubicacion = ubicacion;
    }

    public Time getHorainicio() {
        return horainicio;
    }

    public void setHorainicio(Time horainicio) {
        this.horainicio = horainicio;
    }

    public Date getFecha() {
        return fecha;
    }

    public void setFecha(Date fecha) {
        this.fecha = fecha;
    }

    public ArrayList<Notificacion> getNotificaciones() {
        return notificaciones;
    }

    public void setNotificaciones(ArrayList<Notificacion> notificaciones) {
        this.notificaciones = notificaciones;
    }

    public String getTipo() {
        return tipo;
    }

    public void setTipo(String tipo) {
        this.tipo = tipo;
    }
}
