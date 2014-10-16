package cl.duoc.descubretusede.model;

import java.util.ArrayList;

/**
 * Created by kurt on 13-10-2014.
 */
public class Seccion {

    private int idSeccion,numeroSeccion;
    private String profesor;
    private char jornada;
    private ArrayList<Horario> horarios;

    public Seccion() {
    }

    public Seccion(int idSeccion, int numeroSeccion, String profesor, char jornada, ArrayList<Horario> horarios) {
        this.idSeccion = idSeccion;
        this.numeroSeccion = numeroSeccion;
        this.profesor = profesor;
        this.jornada = jornada;
        this.horarios = horarios;
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
