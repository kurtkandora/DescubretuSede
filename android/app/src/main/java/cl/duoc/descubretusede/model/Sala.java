package cl.duoc.descubretusede.model;

/**
 * Created by Administrador on 15/12/2014.
 */
public class Sala {

    private String id_seccion,profesor,nombre_asignatura, nombre_aula,hora_inicio, hora_termino,dia_clases,jornada;

    public Sala(){

    }

    public String getDia_clases() {
        return dia_clases;
    }

    public String getJornada() {
        return jornada;
    }

    public String getHora_inicio() {
        return hora_inicio;
    }

    public String getHora_termino() {
        return hora_termino;
    }

    public String getId_seccion() {
        return id_seccion;
    }

    public String getNombre_asignatura() {
        return nombre_asignatura;
    }

    public String getNombre_aula() {
        return nombre_aula;
    }

    public String getProfesor() {
        return profesor;
    }

    public void setDia_clases(String dia_clases) {
        this.dia_clases = dia_clases;
    }

    public void setHora_inicio(String hora_inicio) {
        this.hora_inicio = hora_inicio;
    }

    public void setHora_termino(String hora_termino) {
        this.hora_termino = hora_termino;
    }

    public void setId_seccion(String id_seccion) {
        this.id_seccion = id_seccion;
    }

    public void setJornada(String jornada) {
        this.jornada = jornada;
    }

    public void setNombre_asignatura(String nombre_asignatura) {
        this.nombre_asignatura = nombre_asignatura;
    }

    public void setNombre_aula(String nombre_aula) {
        this.nombre_aula = nombre_aula;
    }

    public void setProfesor(String profesor) {
        this.profesor = profesor;
    }
}
