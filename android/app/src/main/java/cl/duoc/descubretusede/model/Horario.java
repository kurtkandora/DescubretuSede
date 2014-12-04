package cl.duoc.descubretusede.model;

import java.sql.Time;

/**
 * Created by kurt on 13-10-2014.
 */
public class Horario {
    private int idHorario;
    private String diaClases;
    private Time horaInicio,horaTermino;
    private Aula aula;
    private int idSeccion;

    public Horario() {
    }

    public int getIdSeccion() {
        return idSeccion;
    }

    public void setIdSeccion(int idSeccion) {
        this.idSeccion = idSeccion;
    }


    public int getIdHorario() {
        return idHorario;
    }

    public void setIdHorario(int idHorario) {
        this.idHorario = idHorario;
    }

    public String getDiaClases() {
        return diaClases;
    }

    public void setDiaClases(String diaClases) {
        this.diaClases = diaClases;
    }

    public Time getHoraInicio() {
        return horaInicio;
    }

    public void setHoraInicio(Time horaInicio) {
        this.horaInicio = horaInicio;
    }

    public Time getHoraTermino() {
        return horaTermino;
    }

    public void setHoraTermino(Time horaTermino) {
        this.horaTermino = horaTermino;
    }

    public Aula getAula() {
        return aula;
    }

    public void setAula(Aula aula) {
        this.aula = aula;
    }
}
