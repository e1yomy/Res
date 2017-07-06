package mx.com.geekcenter.testrest;

import android.os.AsyncTask;
import android.util.Log;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.URL;

import static mx.com.geekcenter.testrest.MainActivity.c;
import static mx.com.geekcenter.testrest.MainActivity.postDataParams;

/**
 * Created by elyo_ on 18/06/2017.
 */

public class AsyncConsulta extends AsyncTask<String, Void, String> {

    protected void onPreExecute(){}

    @Override
    protected String doInBackground(String... arg0) {

        try {
            URL url = new URL("http://pruebastec.890m.com/finales/datos.php"); // here is your URL path

            //creamos el json con los parametros
            //$tabla,$usu,$pas,$nom,$paterno,$materno,$calles,$numeroExterior,$numeroInterior,$entreCalles,$colonia,$CP,$entidad,$municipio,$telefono


            HttpURLConnection conn = (HttpURLConnection) url.openConnection();
            conn.setReadTimeout(15000 /* milliseconds */);
            conn.setConnectTimeout(15000 /* milliseconds */);
            conn.setRequestMethod("POST");
            conn.setDoInput(true);
            conn.setDoOutput(true);
            conn.setRequestProperty("Content-Type", "application/json");

            OutputStream os = conn.getOutputStream();
            BufferedWriter writer = new BufferedWriter(
                    new OutputStreamWriter(os, "UTF-8"));
            writer.write(postDataParams.toString());

            writer.flush();
            writer.close();
            os.close();

            int responseCode=conn.getResponseCode();

            InputStream inputStream;
            // get stream
            if (conn.getResponseCode() < HttpURLConnection.HTTP_BAD_REQUEST)
            {
                inputStream = conn.getInputStream();
            } else {
                inputStream = conn.getErrorStream();
            }
            //Debug.waitForDebugger();
            // parse stream
            BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream));
            String temp, response = "";
            while ((temp = bufferedReader.readLine()) != null) {
                response += temp;
            }

            return response;

        }
        catch(Exception e){
            return new String("Exception: " + e.getMessage());
        }

    }

    protected void onPostExecute(String result) {

        Toast.makeText(c, result,
                Toast.LENGTH_LONG).show();

        JSONObject miTabla;
        // try parse the string to a JSON object
        try {
            miTabla = new JSONObject(result);

            // Getting JSON Array node
            JSONArray datos = miTabla.getJSONArray("Tabla");
            String Campo1 = datos.getString(0);
            String Campo2 = datos.getString(1);
            String Campo3 = datos.getString(2);

        } catch (JSONException e) {
            Log.e("JSON Parser", "Error parsing data " + e.toString());
        }


    }
}
