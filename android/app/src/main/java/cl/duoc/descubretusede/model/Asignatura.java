package cl.duoc.descubretusede.model;

import java.util.ArrayList;

/**
 * Created by kurt on 16-10-2014.
 */
public class Asignatura {
    private int idAsignatura;
    private String nombreAsig, siglaAsig;
    private ArrayList<Seccion> secciones;

    public Asignatura() {
    }

    public ArrayList<Seccion> getSecciones() {
        return secciones;
    }

    public void setSecciones(ArrayList<Seccion> secciones) {
        this.secciones = secciones;
    }

    public int getIdAsignatura() {
        return idAsignatura;
    }

    public void setIdAsignatura(int idAsignatura) {
        this.idAsignatura = idAsignatura;
    }

    public String getNombreAsig() {
        return nombreAsig;
    }

    public void setNombreAsig(String nombreAsig) {
        this.nombreAsig = nombreAsig;
    }

    public String getSiglaAsig() {
        return siglaAsig;
    }

    public void setSiglaAsig(String siglaAsig) {
        this.siglaAsig = siglaAsig;
    }
}
