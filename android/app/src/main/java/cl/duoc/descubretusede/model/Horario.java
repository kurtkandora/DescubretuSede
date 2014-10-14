package cl.duoc.descubretusede.model;

import java.sql.Time;

/**
 * Created by kurt on 13-10-2014.
 */
public class Horario {
    private int idHorario;
    private String DiaClases;
    private Time horaInicio,horaTermino;
    private Sala sala;

    public Horario() {
    }

    public Horario(int idHorario, String diaClases, Time horaInicio, Time horaTermino, Sala sala) {
        this.idHorario = idHorario;
        DiaClases = diaClases;
        this.horaInicio = horaInicio;
        this.horaTermino = horaTermino;
        this.sala = sala;
    }

    public int getIdHorario() {
        return idHorario;
    }

    public void setIdHorario(int idHorario) {
        this.idHorario = idHorario;
    }

    public String getDiaClases() {
        return DiaClases;
    }

    public void setDiaClases(String diaClases) {
        DiaClases = diaClases;
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

    public Sala getSala() {
        return sala;
    }

    public void setSala(Sala sala) {
        this.sala = sala;
    }
}
