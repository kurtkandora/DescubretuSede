package cl.duoc.descubretusede.model;

/**
 * Created by Administrador on 15/12/2014.
 */
public class Sala {

    private String id_seccion;
    private String profesor;
    private String nombre_asignatura;
    private String nombre_aula;
    private String hora_inicio;
    private String hora_termino;
    private String dia_clases;
    private String jornada;

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

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;

        Sala sala = (Sala) o;

        if (dia_clases != null ? !dia_clases.equals(sala.dia_clases) : sala.dia_clases != null)
            return false;
        if (hora_inicio != null ? !hora_inicio.equals(sala.hora_inicio) : sala.hora_inicio != null)
            return false;
        if (hora_termino != null ? !hora_termino.equals(sala.hora_termino) : sala.hora_termino != null)
            return false;
        if (id_seccion != null ? !id_seccion.equals(sala.id_seccion) : sala.id_seccion != null)
            return false;
        if (jornada != null ? !jornada.equals(sala.jornada) : sala.jornada != null) return false;
        if (nombre_asignatura != null ? !nombre_asignatura.equals(sala.nombre_asignatura) : sala.nombre_asignatura != null)
            return false;
        if (nombre_aula != null ? !nombre_aula.equals(sala.nombre_aula) : sala.nombre_aula != null)
            return false;
        if (profesor != null ? !profesor.equals(sala.profesor) : sala.profesor != null)
            return false;

        return true;
    }

}
