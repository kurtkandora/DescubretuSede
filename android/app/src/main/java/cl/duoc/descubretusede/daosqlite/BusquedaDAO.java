package cl.duoc.descubretusede.daosqlite;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

/**
 * Created by kurt on 05-01-2015.
 */
public class BusquedaDAO {

    private static  DataHelper dataHelper;
    private static SQLiteDatabase sqLiteDatabase;
    private Context context;

    public BusquedaDAO(Context context) {
        this.context = context;
        dataHelper = new DataHelper(context);

    }

    public BusquedaDAO(){

    }

    public Boolean existe(String busquedaRealizada, int tipoDeBusqueda)
    {
        sqLiteDatabase = dataHelper.getReadableDatabase();
        Cursor salaCursor = sqLiteDatabase.rawQuery("Select _ID from busqueda where busqueda_realizada = '" + busquedaRealizada +
                "' and tipo_de_busqueda = " + tipoDeBusqueda, null);
        return salaCursor.moveToFirst();
    }

    public Boolean insertarBusqueda (String busquedaRealizada, int tipoDeBusqueda)
    {
        try {
            sqLiteDatabase = dataHelper.getWritableDatabase();
            sqLiteDatabase.execSQL("insert into busqueda(busqueda_realizada,tipo_de_busqueda) values ("
                    +"'"+ busquedaRealizada +"'"+ ","
                    +tipoDeBusqueda + ")");
            return true;
        }
        catch (Exception e){
            e.printStackTrace();
            return false;

        }
    }


}
