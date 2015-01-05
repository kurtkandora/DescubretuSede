package cl.duoc.descubretusede.daosqlite;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

import java.util.ArrayList;

import cl.duoc.descubretusede.model.Sala;

/**
 * Created by Administrador on 15/12/2014.
 */
public class SalaDAO {

    private static  DataHelper dataHelper;
    private static SQLiteDatabase sqLiteDatabase;
    private Context context;

    public SalaDAO(Context context) {
        this.context = context;
        dataHelper = new DataHelper(context);

    }

    public SalaDAO(){

    }


    public ArrayList<Sala> getSalaSeccion(String idSeccion){
        ArrayList<Sala> salas = new ArrayList<Sala>();
        Sala sala= new Sala();
        sqLiteDatabase = dataHelper.getReadableDatabase();
        Cursor salaCursor = sqLiteDatabase.rawQuery("Select JORNADA,PROFESOR,NOMBRE_ASIGNATURA,NOMBRE_AULA,HORA_INICIO,HORA_TERMINO,DIA_CLASES from sala " +
                "where ID_SECCION = "+"'"+idSeccion+"'",null);
        ArrayList<Sala> listaSalas = new ArrayList<Sala>();

        if(salaCursor.moveToFirst()) {
            do {
                sala.setId_seccion(idSeccion);
                sala.setJornada(salaCursor.getString(0));
                sala.setProfesor(salaCursor.getString(1));
                sala.setNombre_asignatura(salaCursor.getString(2));
                sala.setNombre_aula(salaCursor.getString(3));
                sala.setHora_inicio(salaCursor.getString(4));
                sala.setHora_termino(salaCursor.getString(5));
                sala.setDia_clases(salaCursor.getString(6));
                salas.add(sala);
            }while(salaCursor.moveToNext());
        }
        return salas;

    }


    public ArrayList<Sala> getSalaDocente(String docente){

        ArrayList<Sala> salas = new ArrayList<Sala>();
        Sala sala= new Sala();
        sqLiteDatabase = dataHelper.getReadableDatabase();
        Cursor salaCursor = sqLiteDatabase.rawQuery("Select ID_SECCION,JORNADA,NOMBRE_ASIGNATURA,NOMBRE_AULA,HORA_INICIO,HORA_TERMINO,DIA_CLASES from sala " +
                "where PROFESOR = "+"'"+docente+"'",null);
        if(salaCursor.moveToFirst()) {
            do {
                sala.setProfesor(docente);
                sala.setId_seccion(salaCursor.getString(0));
                sala.setJornada(salaCursor.getString(1));
                sala.setNombre_asignatura(salaCursor.getString(2));
                sala.setNombre_aula(salaCursor.getString(3));
                sala.setHora_inicio(salaCursor.getString(4));
                sala.setHora_termino(salaCursor.getString(5));
                sala.setDia_clases(salaCursor.getString(6));
                salas.add(sala);
            }while(salaCursor.moveToNext());
        }
        return salas;

    }


    public ArrayList<Sala> getSalaAsignatura(String asignatura){
        ArrayList<Sala> salas = new ArrayList<Sala>();
        Sala sala= new Sala();
        sqLiteDatabase = dataHelper.getReadableDatabase();
        Cursor salaCursor = sqLiteDatabase.rawQuery("Select ID_SECCION,PROFESOR,JORNADA,NOMBRE_AULA,HORA_INICIO,HORA_TERMINO,DIA_CLASES from sala " +
                "where NOMBRE_ASIGNATURA = "+"'"+asignatura+"'",null);
        if(salaCursor.moveToFirst()) {
            do {
                sala.setNombre_asignatura(asignatura);
                sala.setId_seccion(salaCursor.getString(0));
                sala.setProfesor(salaCursor.getString(1));
                sala.setJornada(salaCursor.getString(2));
                sala.setNombre_aula(salaCursor.getString(3));
                sala.setHora_inicio(salaCursor.getString(4));
                sala.setHora_termino(salaCursor.getString(5));
                sala.setDia_clases(salaCursor.getString(6));
                salas.add(sala);
            }while(salaCursor.moveToNext());
        }
        return salas;

    }

    public ArrayList<Sala> getSalaAula(String aula){
        ArrayList<Sala> salas = new ArrayList<Sala>();
        Sala sala= new Sala();
        sqLiteDatabase = dataHelper.getReadableDatabase();
        Cursor salaCursor = sqLiteDatabase.rawQuery("Select ID_SECCION,PROFESOR,JORNADA,NOMBRE_ASIGNATURA,HORA_INICIO,HORA_TERMINO,DIA_CLASES from sala " +
                "where NOMBRE_AULA = "+"'"+aula+"'",null);
        if(salaCursor.moveToFirst()) {
            do {
                sala.setNombre_aula(aula);
                sala.setId_seccion(salaCursor.getString(0));
                sala.setProfesor(salaCursor.getString(1));
                sala.setJornada(salaCursor.getString(2));
                sala.setNombre_asignatura(salaCursor.getString(3));
                sala.setHora_inicio(salaCursor.getString(4));
                sala.setHora_termino(salaCursor.getString(5));
                sala.setDia_clases(salaCursor.getString(6));
                salas.add(sala);
            }while(salaCursor.moveToNext());
        }
        return salas;

    }


    public ArrayList<Sala> getSalaJornada(String jornada){
        ArrayList<Sala> salas = new ArrayList<Sala>();
        Sala sala= new Sala();
        sqLiteDatabase = dataHelper.getReadableDatabase();
        Cursor salaCursor = sqLiteDatabase.rawQuery("Select ID_SECCION,PROFESOR,NOMBRE_ASIGNATURA,NOMBRE_AULA,HORA_INICIO,HORA_TERMINO,DIA_CLASES from sala " +
                "where JORNADA = "+"'"+jornada+"'",null);
        if(salaCursor.moveToFirst()) {
            do {
                sala.setJornada(jornada);
                sala.setId_seccion(salaCursor.getString(0));
                sala.setProfesor(salaCursor.getString(1));
                sala.setNombre_asignatura(salaCursor.getString(2));
                sala.setNombre_aula(salaCursor.getString(3));
                sala.setHora_inicio(salaCursor.getString(4));
                sala.setHora_termino(salaCursor.getString(5));
                sala.setDia_clases(salaCursor.getString(6));
                salas.add(sala);
            }while(salaCursor.moveToNext());
        }
        return salas;

    }


    public ArrayList<Sala> getSalaDia(String dia){
        ArrayList<Sala>salas = new ArrayList<Sala>();
        Sala sala= new Sala();
        sqLiteDatabase = dataHelper.getReadableDatabase();
        Cursor salaCursor = sqLiteDatabase.rawQuery("Select ID_SECCION,JORNADA,PROFESOR,NOMBRE_ASIGNATURA,NOMBRE_AULA,HORA_INICIO,HORA_TERMINO from sala " +
                "where DIA_CLASES= "+"'"+dia+"'",null);
        if(salaCursor.moveToFirst()) {
            do {
                sala.setDia_clases(dia);
                sala.setId_seccion(salaCursor.getString(0));
                sala.setJornada(salaCursor.getString(1));
                sala.setProfesor(salaCursor.getString(2));
                sala.setNombre_asignatura(salaCursor.getString(3));
                sala.setNombre_aula(salaCursor.getString(4));
                sala.setHora_inicio(salaCursor.getString(5));
                sala.setHora_termino(salaCursor.getString(6));
                salas.add(sala);
            }while(salaCursor.moveToNext());
        }
        return salas;

    }


    public ArrayList<Sala> getSalaHoraI(String horai){
        ArrayList<Sala>salas = new ArrayList<Sala>();
        Sala sala= new Sala();
        sqLiteDatabase = dataHelper.getReadableDatabase();
        Cursor salaCursor = sqLiteDatabase.rawQuery("Select ID_SECCION,JORNADA,PROFESOR,NOMBRE_ASIGNATURA,NOMBRE_AULA,HORA_TERMINO,DIA_CLASES from sala " +
                "where HORA_INICIO= "+"'"+horai+"'",null);
        if(salaCursor.moveToFirst()) {
            do {
                sala.setHora_inicio(horai);
                sala.setId_seccion(salaCursor.getString(0));
                sala.setJornada(salaCursor.getString(1));
                sala.setProfesor(salaCursor.getString(2));
                sala.setNombre_asignatura(salaCursor.getString(3));
                sala.setNombre_aula(salaCursor.getString(4));
                sala.setHora_termino(salaCursor.getString(5));
                sala.setDia_clases(salaCursor.getString(6));
                salas.add(sala);
            }while(salaCursor.moveToNext());
        }
        return salas;

    }

    public ArrayList<Sala> getSalaHoraT(String horat){
        ArrayList<Sala>salas = new ArrayList<Sala>();
        Sala sala= new Sala();
        sqLiteDatabase = dataHelper.getReadableDatabase();
        Cursor salaCursor = sqLiteDatabase.rawQuery("Select ID_SECCION,JORNADA,PROFESOR,NOMBRE_ASIGNATURA,NOMBRE_AULA,HORA_INICIO,DIA_CLASES from sala " +
                "where HORA_TERMINO= "+"'"+horat+"'",null);
        if(salaCursor.moveToFirst()) {
            do {
                sala.setHora_termino(horat);
                sala.setId_seccion(salaCursor.getString(0));
                sala.setJornada(salaCursor.getString(1));
                sala.setProfesor(salaCursor.getString(2));
                sala.setNombre_asignatura(salaCursor.getString(3));
                sala.setNombre_aula(salaCursor.getString(4));
                sala.setHora_inicio(salaCursor.getString(5));
                sala.setDia_clases(salaCursor.getString(6));
                salas.add(sala);
            }while(salaCursor.moveToNext());
        }
        return salas;

    }



    public ArrayList<Sala> getSabana(String dia,String nombreSala){
        ArrayList<Sala>salas = new ArrayList<Sala>();
        Sala sala= new Sala();
        sqLiteDatabase = dataHelper.getReadableDatabase();
        Cursor salaCursor = sqLiteDatabase.rawQuery("Select ID_SECCION,JORNADA,PROFESOR,NOMBRE_ASIGNATURA,HORA_INICIO,HORA_TERMINO from sala " +
                "where DIA_CLASES= "+"'"+dia+"'"+"AND NOMBRE_AULA="+"'"+nombreSala+"'",null);
        if(salaCursor.moveToFirst()) {
            do {
                sala.setDia_clases(dia);
                sala.setNombre_aula(nombreSala);
                sala.setId_seccion(salaCursor.getString(0));
                sala.setJornada(salaCursor.getString(1));
                sala.setProfesor(salaCursor.getString(2));
                sala.setNombre_asignatura(salaCursor.getString(3));
                sala.setHora_inicio(salaCursor.getString(4));
                sala.setHora_termino(salaCursor.getString(5));
                salas.add(sala);
            }while(salaCursor.moveToNext());
        }
        return salas;

    }


    public boolean insertSala (Sala sala){

        ArrayList<Sala> salas = getSalaDocente(sala.getProfesor());

        for (Sala objSala:salas) {
            if(objSala.equals(sala)){
                return true;
            }
        }
        try {
            sqLiteDatabase = dataHelper.getWritableDatabase();
            sqLiteDatabase.execSQL("insert into sala(ID_SECCION,JORNADA,PROFESOR,NOMBRE_ASIGNATURA," +
                    "NOMBRE_AULA,HORA_INICIO,HORA_TERMINO,DIA_CLASES) values ("
                    +"'"+ sala.getId_seccion() +"'"+ ","
                    +"'"+ sala.getJornada() +"'"+ ","
                    +"'"+ sala.getProfesor() +"'"+ ","
                    +"'"+ sala.getNombre_asignatura() +"'"+ ","
                    +"'"+ sala.getNombre_aula()+"'"+ ","
                    +"'"+ sala.getHora_inicio() +"'"+ ","
                    +"'"+ sala.getHora_termino() +"'"+ ","
                    +"'"+ sala.getDia_clases() + "')");
            return true;
        }
        catch (Exception e){
            e.printStackTrace();
            return false;

        }
    }



}
