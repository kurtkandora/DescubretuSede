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
    private Time hora;
    private Date fecha;
    private ArrayList<Notificacion> notificaciones;
    private ArrayList<Afiche> afiches;

    public Actividad() {
    }

    public Actividad(int idActividad, String nombre, String descripcion, String ubicacion, String tipo, Time hora, Date fecha, ArrayList<Notificacion> notificaciones, ArrayList<Afiche> afiches) {
        this.idActividad = idActividad;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.ubicacion = ubicacion;
        this.tipo = tipo;
        this.hora = hora;
        this.fecha = fecha;
        this.notificaciones = notificaciones;
        this.afiches = afiches;
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

    public Time getHora() {
        return hora;
    }

    public void setHora(Time hora) {
        this.hora = hora;
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

    public ArrayList<Afiche> getAfiches() {
        return afiches;
    }

    public void setAfiches(ArrayList<Afiche> afiches) {
        this.afiches = afiches;
    }

    public String getTipo() {
        return tipo;
    }

    public void setTipo(String tipo) {
        this.tipo = tipo;
    }
}
