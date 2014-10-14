package cl.duoc.descubretusede.model;

import java.util.ArrayList;

/**
 * Created by kurt on 13-10-2014.
 */

//TODO:En que momento se une usuario con asignatura?

public class Uusuario {
    private int idUsuario;
    private String nombres,apeMaterno,apePaterno,Rut,correo,password;
    private ArrayList<Asignatura> asignaturas;

    public Uusuario() {
    }

    public Uusuario(int idUsuario, String nombres, String apeMaterno, String apePaterno, String rut, String correo, String password, ArrayList<Asignatura> asignaturas) {

        this.idUsuario = idUsuario;
        this.nombres = nombres;
        this.apeMaterno = apeMaterno;
        this.apePaterno = apePaterno;
        Rut = rut;
        this.correo = correo;
        this.password = password;
        this.asignaturas = asignaturas;
    }

    public int getIdUsuario() {
        return idUsuario;
    }

    public void setIdUsuario(int idUsuario) {
        this.idUsuario = idUsuario;
    }

    public String getNombres() {
        return nombres;
    }

    public void setNombres(String nombres) {
        this.nombres = nombres;
    }

    public String getApeMaterno() {
        return apeMaterno;
    }

    public void setApeMaterno(String apeMaterno) {
        this.apeMaterno = apeMaterno;
    }

    public String getApePaterno() {
        return apePaterno;
    }

    public void setApePaterno(String apePaterno) {
        this.apePaterno = apePaterno;
    }

    public String getRut() {
        return Rut;
    }

    public void setRut(String rut) {
        Rut = rut;
    }

    public String getCorreo() {
        return correo;
    }

    public void setCorreo(String correo) {
        this.correo = correo;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public ArrayList<Asignatura> getAsignaturas() {
        return asignaturas;
    }

    public void setAsignaturas(ArrayList<Asignatura> asignaturas) {
        this.asignaturas = asignaturas;
    }
}
