package ep.rest

import android.app.Application
import android.content.Intent
import android.os.Bundle
import android.util.Log
import android.widget.AdapterView
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import ep.rest.MyApplication.Companion.globalemail
import ep.rest.MyApplication.Companion.globalpassword
import kotlinx.android.synthetic.main.activity_main.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.io.IOException

class MyApplication: Application() {
    companion object {
        var globalemail = ""
        var globalpassword = ""
    }
}

class MainActivity : AppCompatActivity(), Callback<List<Book>> {
    private val tag = this::class.java.canonicalName

    private lateinit var adapter: BookAdapter

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        adapter = BookAdapter(this)
        items.adapter = adapter
        items.onItemClickListener = AdapterView.OnItemClickListener { _, _, i, _ ->
            val book = adapter.getItem(i)
            if (book != null) {
                val intent = Intent(this, BookDetailActivity::class.java)
                intent.putExtra("ep.rest.idArtikla", book.idArtikla)
                startActivity(intent)
            }
        }
        if(globalemail!=""){
            button2.text = "ODJAVA"
            button2.setOnClickListener{
                globalemail=""
                globalpassword=""
                val activity2Intent = Intent(applicationContext, MainActivity::class.java)
                startActivity(activity2Intent)
            }
            btnProfil.visibility = 1
            btnProfil.setOnClickListener {
                val intent = Intent(this, UserDetailActivity::class.java)
                intent.putExtra("ep.rest.email", globalemail)
                intent.putExtra("ep.rest.geslo", globalpassword)
                startActivity(intent)
            }
        }
        else{
        button2.setOnClickListener{
            val activity2Intent = Intent(applicationContext, SigninActivity::class.java)
            startActivity(activity2Intent)
        }
        }

        container.setOnRefreshListener { BookService.instance.getAll().enqueue(this) }



        BookService.instance.getAll().enqueue(this)
    }

    override fun onResponse(call: Call<List<Book>>, response: Response<List<Book>>) {
        if (response.isSuccessful) {
            val hits = response.body() ?: emptyList()
            Log.i(tag, "Got ${hits.size} hits")
            adapter.clear()
            adapter.addAll(hits)
        } else {
            val errorMessage = try {
                "An error occurred: ${response.errorBody()?.string()}"
            } catch (e: IOException) {
                "An error occurred: error while decoding the error message."
            }

            Toast.makeText(this, errorMessage, Toast.LENGTH_SHORT).show()
            Log.e(tag, errorMessage)
        }
        container.isRefreshing = false
    }

    override fun onFailure(call: Call<List<Book>>, t: Throwable) {
        Log.w(tag, "Error: ${t.message}", t)
        container.isRefreshing = false
    }
}
