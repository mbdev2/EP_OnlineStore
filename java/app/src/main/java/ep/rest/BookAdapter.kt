package ep.rest

import android.content.Context
import android.graphics.Bitmap
import android.graphics.BitmapFactory
import android.media.Image
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ArrayAdapter
import android.widget.TextView
import java.util.*
import android.util.Base64;
import android.util.Log
import android.widget.ImageView


class BookAdapter(context: Context) : ArrayAdapter<Book>(context, 0, ArrayList()) {

    override fun getView(position: Int, convertView: View?, parent: ViewGroup): View {
        // Check if an existing view is being reused, otherwise inflate the view
        val view = if (convertView == null)
            LayoutInflater.from(context).inflate(R.layout.booklist_element, parent, false)
        else
            convertView

        val tvTitle = view.findViewById<TextView>(R.id.tvTitle)
        val tvAuthor = view.findViewById<TextView>(R.id.tvAuthor)
        val tvPrice = view.findViewById<TextView>(R.id.tvPrice)
        val ivIzdelek = view.findViewById<ImageView>(R.id.ivIzdelek)


        val book = getItem(position)
        if (book != null) {
            //Log.i("slika", book.slika1);
            val decodedString: ByteArray = Base64.decode(book.slika1.split(",")[1], Base64.DEFAULT);


            val decodedByte = BitmapFactory.decodeByteArray(decodedString, 0, decodedString.size)
            ivIzdelek.setImageBitmap(decodedByte)

            //Log.i("book", book.toString())
            var povprecnaOcena = 0.0;
            if (book?.stOcen != null && book?.stOcen != 0) {
                povprecnaOcena = book!!.sestevekOcen / book!!.stOcen.toDouble()
            }
            tvTitle.text = book?.ime
            tvPrice.text = String.format(Locale.ENGLISH, "%.2f EUR", book?.cena)
            if (povprecnaOcena != 0.0) {
                tvAuthor.text = String.format(Locale.ENGLISH, "Povp. ocena: %.2f ", povprecnaOcena)
            } else {
                tvAuthor.text = "Ni ocene"
            }
        }
        return view
    }
}
