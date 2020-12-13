package unilj.mmun.fri.ep.projekt.spletnaprodajalna;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.widget.TextView;

public class DetajliIzdelka  extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.product_details);

        String imeIzdelka2 = getIntent().getStringExtra("IME_IZDELKA");
        String opisIzdelka = getIntent().getStringExtra("OPIS_IZDELKA");
        String cenaIzdelka = getIntent().getStringExtra("CENA_IZDELKA");

        TextView imeTxt2 = findViewById(R.id.imeTxtDet);
        imeTxt2.setText(imeIzdelka2);

        TextView opisTxt = findViewById(R.id.opisTxtDet);
        opisTxt.setText(opisIzdelka);

        TextView cenaTxt = findViewById(R.id.cenaTxtDet);
        cenaTxt.setText(cenaIzdelka);
    }
}
