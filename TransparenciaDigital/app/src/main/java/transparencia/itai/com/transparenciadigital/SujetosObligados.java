package transparencia.itai.com.transparenciadigital;

import android.content.Context;
import android.net.Uri;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.List;

import static transparencia.itai.com.transparenciadigital.MainActivity.c;


/**
 * A simple {@link Fragment} subclass.
 * Activities that contain this fragment must implement the
 * {@link SujetosObligados.OnFragmentInteractionListener} interface
 * to handle interaction events.
 * Use the {@link SujetosObligados#newInstance} factory method to
 * create an instance of this fragment.
 */
public class SujetosObligados extends Fragment {
    // TODO: Rename parameter arguments, choose names that match
    // the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";

    // TODO: Rename and change types of parameters
    private String mParam1;
    private String mParam2;

    private OnFragmentInteractionListener mListener;

    public SujetosObligados() {
        // Required empty public constructor
    }

    /**
     * Use this factory method to create a new instance of
     * this fragment using the provided parameters.
     *
     * @param param1 Parameter 1.
     * @param param2 Parameter 2.
     * @return A new instance of fragment SujetosObligados.
     */
    // TODO: Rename and change types and number of parameters
    public static SujetosObligados newInstance(String param1, String param2) {
        SujetosObligados fragment = new SujetosObligados();
        Bundle args = new Bundle();
        args.putString(ARG_PARAM1, param1);
        args.putString(ARG_PARAM2, param2);
        fragment.setArguments(args);
        return fragment;
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if (getArguments() != null) {
            mParam1 = getArguments().getString(ARG_PARAM1);
            mParam2 = getArguments().getString(ARG_PARAM2);
        }
    }


    // TODO: Rename method, update argument and hook method into UI event
    public void onButtonPressed(Uri uri) {
        if (mListener != null) {
            mListener.onFragmentInteraction(uri);
        }
    }

    @Override
    public void onAttach(Context context) {
        super.onAttach(context);
        if (context instanceof OnFragmentInteractionListener) {
            mListener = (OnFragmentInteractionListener) context;
        } else {
            throw new RuntimeException(context.toString()
                    + " must implement OnFragmentInteractionListener");
        }
    }

    @Override
    public void onDetach() {
        super.onDetach();
        mListener = null;
    }

    /**
     * This interface must be implemented by activities that contain this
     * fragment to allow an interaction in this fragment to be communicated
     * to the activity and potentially other fragments contained in that
     * activity.
     * <p>
     * See the Android Training lesson <a href=
     * "http://developer.android.com/training/basics/fragments/communicating.html"
     * >Communicating with Other Fragments</a> for more information.
     */
    public interface OnFragmentInteractionListener {
        // TODO: Update argument type and name
        void onFragmentInteraction(Uri uri);
    }

    int nivel=-1;
    ArrayList<ListView> listas= new ArrayList<>();
    FloatingActionButton btnVolverSO;
    TextView txtTituloSO;
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_sujetos_obligados, container, false);
        listas.add((ListView) view.findViewById(R.id.listSujetosObligados));
        listas.add((ListView) view.findViewById(R.id.listSolicitudes));
        listas.add((ListView) view.findViewById(R.id.listDetalles));
        btnVolverSO=(FloatingActionButton)view.findViewById(R.id.btnVolverSO);
        txtTituloSO= (TextView)view.findViewById(R.id.txtTituloSO);
        Clics();
        ActualizarPantalla(++nivel);

        return view;
    }
    List<String> lista = new ArrayList<String>();
    private void Clics() {
        lista.add("item1");
        lista.add("item2");
        lista.add("item3");
        lista.add("item4");
        lista.add("item5");

        btnVolverSO.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                ActualizarPantalla(--nivel);
            }
        });
        for(byte i=0;i<listas.size();i++)
        {
            ArrayAdapter<String> arrayAdapter = new ArrayAdapter<String>(c,android.R.layout.simple_list_item_1,lista);
            listas.get(i).setAdapter(arrayAdapter);
            if(i!=listas.size()-1) {
                listas.get(i).setOnItemClickListener(new AdapterView.OnItemClickListener() {
                    @Override
                    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                        ActualizarPantalla(++nivel);
                    }
                });
            }

        }
    }

    public void ActualizarPantalla(int n){
        switch (n)
        {
            case 0:
                btnVolverSO.hide();
                txtTituloSO.setText("Listado de Sujetos Obligados");
                break;
            case 1:
                btnVolverSO.show();
                txtTituloSO.setText("Listado solicitudes realizadas al Sujeto Obligado");
                ///Guardar el texto del item seleccionado y mostrarlo aquí
                break;
            case 2:
                btnVolverSO.show();
                txtTituloSO.setText("Detalles de la solicitud");
                break;
        }

        for(byte i=0;i<listas.size();i++)
        {
            listas.get(i).setVisibility(View.GONE);
            if(i==n)
                listas.get(i).setVisibility(View.VISIBLE);
        }

    }
}
