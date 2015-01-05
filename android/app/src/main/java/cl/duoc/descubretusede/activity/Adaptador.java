package cl.duoc.descubretusede.activity;

import android.content.Context;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseExpandableListAdapter;
import android.widget.TextView;

import java.util.ArrayList;

import cl.duoc.descubretusede.model.Sala;

/**
 * Created by Administrador on 05-01-2015.
 */
public class Adaptador extends BaseExpandableListAdapter {
    private Context context;
    private ArrayList<Sala> sabana;
    private String[]parentList;
    private String[][]childList;

    public Adaptador(Context context, ArrayList<Sala>sabana) {
        this.context= context;
        this.sabana=sabana;
        parentList = new String[sabana.size()];
        childList = new String[sabana.size()][8];
        construyeParentList();
        construyeChildList();
    }

    private void construyeChildList() {
        for (int i = 0; i <sabana.size() ; i++) {
            for (int j = 0; j <1 ; j++) {
                childList[i][0]="Asignatura: "+sabana.get(i).getNombre_asignatura();
                childList[i][1]="Nombre Sala: "+sabana.get(i).getNombre_aula();
                childList[i][2]="Sección: "+sabana.get(i).getId_seccion();
                childList[i][3]="Dia Clases: "+sabana.get(i).getDia_clases();
                childList[i][4]="Profesor: "+sabana.get(i).getProfesor();
                childList[i][5]="Jornada: "+sabana.get(i).getJornada();
                childList[i][6]="Hora Inicio: "+sabana.get(i).getHora_inicio();
                childList[i][7]="Hora Termino: "+sabana.get(i).getHora_termino();

            }
        }
    }

    private void construyeParentList() {
        for (int i = 0; i < sabana.size(); i++) {
            parentList[i]=sabana.get(i).getNombre_asignatura();
        }
    }


    @Override
    public int getGroupCount() {
        return parentList.length;
    }

    @Override
    public int getChildrenCount(int i) {
        return childList[i].length;
    }

    @Override
    public Object getGroup(int i) {
        return i;
    }

    @Override
    public Object getChild(int i, int i2) {
        return null;
    }

    @Override
    public long getGroupId(int i) {
        return i;
    }

    @Override
    public long getChildId(int i, int i2) {
        return 0;
    }

    @Override
    public boolean hasStableIds() {
        return false;
    }

    @Override
    public View getGroupView(int i, boolean b, View view, ViewGroup viewGroup) {
        TextView tv = new TextView(context);
        tv.setText(parentList[i]);
        tv.setPadding(50,0,0,0);
        return tv;
    }

    @Override
    public View getChildView(int i, int i2, boolean b, View view, ViewGroup viewGroup) {
        TextView tv = new TextView(context);
        tv.setText(childList[i][i2]);
        tv.setPadding(60,0,0,0);
        return tv;
    }

    @Override
    public boolean isChildSelectable(int i, int i2) {
        return false;
    }
}
