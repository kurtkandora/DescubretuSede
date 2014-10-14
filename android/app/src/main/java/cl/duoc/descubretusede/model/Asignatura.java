package cl.duoc.descubretusede.model;

import java.util.ArrayList;

/**
 * Created by kurt on 13-10-2014.
 */
public class Asignatura {

    private int idAsignatura,idSeccion,numeroSeccion;
    private String nombre,sigla,profesor;
    private char jornada;
    private ArrayList<Horario> horarios;

    public Asignatura() {
    }

    public Asignatura(int idAsignatura, int idSeccion, int numeroSeccion, String nombre, String sigla, String profesor, char jornada, ArrayList<Horario> horarios) {
        this.idAsignatura = idAsignatura;
        this.idSeccion = idSeccion;
        this.numeroSeccion = numeroSeccion;
        this.nombre = nombre;
        this.sigla = sigla;
        this.profesor = profesor;
        this.jornada = jornada;
        this.horarios = horarios;
    }

    public int getIdAsignatura() {
        return idAsignatura;
    }

    public void setIdAsignatura(int idAsignatura) {
        this.idAsignatura = idAsignatura;
    }

    public int getIdSeccion() {
        return idSeccion;
    }

    public void setIdSeccion(int idSeccion) {
        this.idSeccion = idSeccion;
    }

    public int getNumeroSeccion() {
        return numeroSeccion;
    }

    public void setNumeroSeccion(int numeroSeccion) {
        this.numeroSeccion = numeroSeccion;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getSigla() {
        return sigla;
    }

    public void setSigla(String sigla) {
        this.sigla = sigla;
    }

    public String getProfesor() {
        return profesor;
    }

    public void setProfesor(String profesor) {
        this.profesor = profesor;
    }

    public char getJornada() {
        return jornada;
    }

    public void setJornada(char jornada) {
        this.jornada = jornada;
    }

    public ArrayList<Horario> getHorarios() {
        return horarios;
    }

    public void setHorarios(ArrayList<Horario> horarios) {
        this.horarios = horarios;
    }
}
