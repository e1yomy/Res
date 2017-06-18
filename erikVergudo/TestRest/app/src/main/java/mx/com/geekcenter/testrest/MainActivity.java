package mx.com.geekcenter.testrest;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.os.AsyncTask;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.Toast;
import android.util.Log;

import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.OutputStreamWriter;
import java.io.OutputStream;
import java.io.InputStream;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;

import org.json.JSONObject;
import org.json.JSONArray;
import org.json.JSONException;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Button Acceso = null;
        Button Solicitud = null;
        Button MisSolicitudes = null;
        Button Registros = null;
        Registros = (Button) findViewById(R.id.registroBtn);
        MisSolicitudes =(Button) findViewById(R.id.misSolBtn);
        Solicitud =(Button) findViewById(R.id.SolSujBtn);
        Acceso = (Button) findViewById(R.id.inicioBtn);
        String sesiones[] =  getResources().getStringArray(R.array.tablas_arrays);
        Spinner spinner = (Spinner) findViewById(R.id.spinner);
        ArrayAdapter<String> spinnerArrayAdapter = new ArrayAdapter<String>(
                this, android.R.layout.simple_spinner_item, sesiones );
        spinnerArrayAdapter.setDropDownViewResource( android.R.layout.simple_spinner_dropdown_item );
        spinner.setAdapter(spinnerArrayAdapter);
       Acceso.setOnClickListener(new View.OnClickListener(){

           @Override
           public void onClick(View v) {
               try {
                       new SendPostRequest2().execute();
               } catch (Exception e) {
                   e.printStackTrace();
               }
           }
       });
        Registros.setOnClickListener(new View.OnClickListener(){

            @Override
            public void onClick(View v) {
                try {
                    new SendPostRequest5().execute();
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        });

        MisSolicitudes.setOnClickListener(new View.OnClickListener(){

            @Override
            public void onClick(View v) {
                try {
                    new SendPostRequest4().execute();
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        });
        Solicitud.setOnClickListener(new View.OnClickListener(){

            @Override
            public void onClick(View v) {
                try {
                    new SendPostRequest3().execute();
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        });
        spinner.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
        //spinner.setOnItemSelectedListener(new OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                String Tabla =parent.getSelectedItem().toString();
               // new SendPostRequest().execute(Tabla);
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {
                //Another interface callback
            }
        });
    }

    public class SendPostRequest5 extends AsyncTask<String, Void, String> {

        protected void onPreExecute(){}

        protected String doInBackground(String... arg0) {

            try {
                URL url = new URL("http://pruebastec.890m.com/finales/datos.php"); // here is your URL path

                //creamos el json con los parametros
                //$tabla,$usu,$pas,$nom,$paterno,$materno,$calles,$numeroExterior,$numeroInterior,$entreCalles,$colonia,$CP,$entidad,$municipio,$telefono
                JSONObject postDataParams = new JSONObject();
                postDataParams.put("token", "12345678");
                postDataParams.put("funcion", "registro");
                postDataParams.put("tabla", "ciudadano");
                postDataParams.put("usu", "rony@hotmail.com");
                postDataParams.put("pas", "11");
                postDataParams.put("nom", "Ronaldo");
                postDataParams.put("paterno", "Trasvina");
                postDataParams.put("materno", "Amador");
                postDataParams.put("calles", "Zapata");
                postDataParams.put("numeroExterior", "111");
                postDataParams.put("numeroInterior", "12");
                postDataParams.put("entreCalles", "16 de septiembre");
                postDataParams.put("colonia", "ejemplo");
                postDataParams.put("CP", "23040");
                postDataParams.put("entidad", "la paz");
                postDataParams.put("municipio", "la paz");
                postDataParams.put("telefono", "6121478521");
                Log.e("params",postDataParams.toString());

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

        @Override
        protected void onPostExecute(String result) {
            Toast.makeText(getApplicationContext(), result,
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

    public class SendPostRequest4 extends AsyncTask<String, Void, String> {

        protected void onPreExecute(){}

        protected String doInBackground(String... arg0) {

            try {
                URL url = new URL("http://pruebastec.890m.com/finales/datos.php"); // here is your URL path

                //creamos el json con los parametros
                JSONObject postDataParams = new JSONObject();
                postDataParams.put("token", "12345678");
                postDataParams.put("funcion", "misSolicitudes");
                postDataParams.put("tabla", "solAcceso");
                postDataParams.put("idTabla", "idAcceso");
                postDataParams.put("idUsuario", "1");
                Log.e("params",postDataParams.toString());

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

        @Override
        protected void onPostExecute(String result) {
            Toast.makeText(getApplicationContext(), result,
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

    public class SendPostRequest3 extends AsyncTask<String, Void, String> {

        protected void onPreExecute(){}

        protected String doInBackground(String... arg0) {

            try {
                URL url = new URL("http://pruebastec.890m.com/finales/datos.php"); // here is your URL path
                // URL url = new URL("http://www.acadep.com/enocuo/sistema/ws/app/usuarios/"); // here is your URL path

                //creamos el json con los parametros
                JSONObject postDataParams = new JSONObject();
                postDataParams.put("token", "12345678");
                postDataParams.put("funcion", "listarSolicitudSujetos");
                postDataParams.put("tabla", "solAcceso");
                postDataParams.put("idSuj", "1");
                Log.e("params",postDataParams.toString());

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

        @Override
        protected void onPostExecute(String result) {
            Toast.makeText(getApplicationContext(), result,
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

    public class SendPostRequest2 extends AsyncTask<String, Void, String> {

        protected void onPreExecute(){}

        protected String doInBackground(String... arg0) {

            try {
                URL url = new URL("http://pruebastec.890m.com/finales/datos.php"); // here is your URL path
                // URL url = new URL("http://www.acadep.com/enocuo/sistema/ws/app/usuarios/"); // here is your URL path

                //creamos el json con los parametros
                JSONObject postDataParams = new JSONObject();
                postDataParams.put("token", "12345678");
                postDataParams.put("funcion", "acceso");
                postDataParams.put("tabla", "ciudadano");
                postDataParams.put("usuario", "darioweber@msn.com");
                postDataParams.put("contrasena", "0");
                Log.e("params",postDataParams.toString());

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

        @Override
        protected void onPostExecute(String result) {
            Toast.makeText(getApplicationContext(), result,
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
    
    public class SendPostRequest extends AsyncTask<String, Void, String> {

        protected void onPreExecute(){}

        protected String doInBackground(String... arg0) {

            try {
                String Tabla = arg0[0];
               URL url = new URL("http://pruebastec.890m.com/ws/usuarios/usuarios.php"); // here is your URL path
               // URL url = new URL("http://www.acadep.com/enocuo/sistema/ws/app/usuarios/"); // here is your URL path

                JSONObject postDataParams = new JSONObject();
                postDataParams.put("token", "12345678");
                postDataParams.put("funcion", Tabla);
                Log.e("params",postDataParams.toString());

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

        @Override
        protected void onPostExecute(String result) {
            Toast.makeText(getApplicationContext(), result,
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
}
