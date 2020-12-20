package ep.rest

import android.graphics.BitmapFactory
import android.os.Bundle
import android.util.Base64
import android.util.Log
import androidx.appcompat.app.AppCompatActivity
import kotlinx.android.synthetic.main.activity_book_detail.*
import kotlinx.android.synthetic.main.content_book_detail.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.io.IOException
import java.util.*

class BookDetailActivity : AppCompatActivity() {
    private var book: Book = Book()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_book_detail)
        setSupportActionBar(toolbar)

        supportActionBar?.setDisplayHomeAsUpEnabled(true)

        val id = intent.getIntExtra("ep.rest.idArtikla", 0)

        if (id > 0) {
            BookService.instance.get(id).enqueue(OnLoadCallbacks(this))
        }
    }



    private class OnLoadCallbacks(val activity: BookDetailActivity) : Callback<Book> {
        private val tag = this::class.java.canonicalName

        override fun onResponse(call: Call<Book>, response: Response<Book>) {
            activity.book = response.body() ?: Book()

            Log.i(tag, "Got result: ${activity.book}")

            if (response.isSuccessful) {
                activity.tvBookDetail.text = activity.book.opis
                activity.tvBookDetailPrice.text = String.format(Locale.ENGLISH, "Cena: %.2f EUR", activity.book.cena)
                activity.toolbarLayout.title = activity.book.ime
                activity.tvStOcen.text = "Ocenjeno "+activity.book.stOcen+"-krat."
                if(activity.book.stOcen!=0 && activity.book.stOcen!=null){
                    var povprecnaOcena = activity.book.sestevekOcen / activity.book.stOcen.toDouble()
                    activity.tvPovpOcena.text = String.format(Locale.ENGLISH, "Povprecna ocena: %.2f ", povprecnaOcena)
                }

                if(activity.book.slika1!= null){
                    val decodedString: ByteArray = Base64.decode(activity.book.slika1.split(",")[1], Base64.DEFAULT);
                    val decodedByte = BitmapFactory.decodeByteArray(decodedString, 0, decodedString.size)
                    activity.ivIzdelek1.setImageBitmap(decodedByte)
                }
                if(activity.book.slika2!= null){
                    val decodedString: ByteArray = Base64.decode(activity.book.slika2.split(",")[1], Base64.DEFAULT);
                    val decodedByte = BitmapFactory.decodeByteArray(decodedString, 0, decodedString.size)
                    activity.ivIzdelek2.setImageBitmap(decodedByte)
                }
                if(activity.book.slika3!= null){
                    val decodedString: ByteArray = Base64.decode(activity.book.slika3.split(",")[1], Base64.DEFAULT);
                    val decodedByte = BitmapFactory.decodeByteArray(decodedString, 0, decodedString.size)
                    activity.ivIzdelek3.setImageBitmap(decodedByte)
                }

            } else {
                val errorMessage = try {
                    "An error occurred: ${response.errorBody()?.string()}"
                } catch (e: IOException) {
                    "An error occurred: error while decoding the error message."
                }

                Log.e(tag, errorMessage)
                activity.tvBookDetail.text = errorMessage
            }
        }

        override fun onFailure(call: Call<Book>, t: Throwable) {
            Log.w(tag, "Error: ${t.message}", t)
        }
    }
}

