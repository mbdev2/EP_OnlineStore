package ep.rest


import retrofit2.Call
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory
import retrofit2.http.*


object BookService {

    interface RestApi {

        companion object {
            // AVD emulator
            const val URL = "http://10.0.2.2:80/"
            // Genymotion
            // const val URL = "http://10.0.3.2:8080/"
        }

        @GET("android.php")
        fun getAll(): Call<List<Book>>

        @GET("/androidDetails.php")
        fun get(@Query("idArtikla") idArtikla: Int): Call<Book>


        @GET("androidAccount.php")
        fun getAccount(@Query("email") email: String?, @Query("geslo") geslo: String?): Call<User>
    }

    val instance: RestApi by lazy {
        val retrofit = Retrofit.Builder()
                .baseUrl(RestApi.URL)
                .addConverterFactory(GsonConverterFactory.create())
                .build()

        retrofit.create(RestApi::class.java)
    }
}
