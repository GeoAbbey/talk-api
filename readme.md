# Street Capital Conference API

> Street Capital Conference API - Built with Laravel Lumen Framework

**ADD A TALK**
----

* **URL**

  http://sc-talk-api.herokuapp.com/talk

* **Method:**

  `POST`
  
*  **URL Params**

   **Required:**
 
   `title=[string]` <br>
   `abstract=[string]` <br>
   `room=[integer]` <br>
   `speaker_name=[string]` <br>
   `speaker_company=[string]` <br>
   `speaker_email=[string]` <br>
   `speaker_bio=[string]` <br>

* **Success Response:**

  * **Code:** 200 OK
 
* **Error Response:**

  * **Code:** 405 METHOD NOT ALLOWED

<br>
<br>

**ADD AN ATTENDEE TO A TALK**
----

* **URL**

  http://sc-talk-api.herokuapp.com/talk/id

* **Method:**

  `POST`
  
*  **URL Params**

   **Required:**
 
   `name=[string]` <br>
   `company=[string]` <br>
   `email=[string]` <br>
   `registered=[boolean]` <br>

* **Success Response:**

  * **Code:** 200 OK
 
* **Error Response:**

  * **Code:** 405 METHOD NOT ALLOWED

  <br>
<br>

**DELETE A TALK**
----

* **URL**

  http://sc-talk-api.herokuapp.com/talk/id

* **Method:**

  `DELETE`

* **Success Response:**

  * **Code:** 200 OK
 
* **Error Response:**

  * **Code:** 405 METHOD NOT ALLOWED