package unilj.mmun.fri.ep.projekt.spletnaprodajalna;

import android.content.Intent;
import android.os.AsyncTask;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.LinearLayout;
import android.widget.TextView;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

public class DobiPodatke extends AsyncTask<String, String, String> {

    public MainActivity activity;

    public DobiPodatke(MainActivity a) {
        this.activity = a;
    }

    @Override
    protected String doInBackground(String... strings) {
        String script_url = "http://10.0.2.2/android.php";
        try {
            URL url = new URL(script_url);
            HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
            httpURLConnection.setRequestMethod("POST");
            httpURLConnection.setDoInput(true);
            InputStream inputStream = httpURLConnection.getInputStream();
            BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream,"utf8"));
            String response = "";
            String line = "";
            while ((line = bufferedReader.readLine()) != null) {
                response += line;
            }
            bufferedReader.close();
            inputStream.close();
            httpURLConnection.disconnect();
            return response;
        } catch (MalformedURLException e) {
            e.printStackTrace();
            return "Napaka 1";
        } catch (IOException e) {
            e.printStackTrace();
            return "Napaka 2";
        }

    }

    @Override
    protected void onPostExecute(String result) {
        final String izdelki[] = result.split("NOV-IZDELEK");
        int i = 0;
        while (i < izdelki.length) {
            LayoutInflater inflater = activity.getLayoutInflater();
            LinearLayout linearLayout = activity.findViewById(R.id.linearLayout);
            View view = inflater.inflate(R.layout.product_template, null);
            linearLayout.addView(view);
            TextView imeTxt = view.findViewById(R.id.imeTxt);
            final String imeIzdelka = izdelki[i].split("NOV-ATRIBUT")[0];
            final String opisIzdelka = izdelki[i].split("NOV-ATRIBUT")[1];
            final String cenaIzdelka = izdelki[i].split("NOV-ATRIBUT")[2].concat("€");
            imeTxt.setText(imeIzdelka);
            imeTxt.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Intent intent = new Intent(activity, DetajliIzdelka.class);
                    intent.putExtra("IME_IZDELKA", imeIzdelka);
                    intent.putExtra("OPIS_IZDELKA", opisIzdelka);
                    intent.putExtra("CENA_IZDELKA", cenaIzdelka);
                    activity.startActivity(intent);
                }
            });
            i++;
        }
    }
}
