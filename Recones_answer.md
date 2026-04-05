Task 1: Understand the Flow

when entering the email and clicking the save button, the input value is save in the POST and push it to the session where it save the transaction. After that it goes into Route::get where it takes the session find the value and show it to formtest where it goes to show your input email.

Reflection Question 

1. What is the difference between GET and POST?
Base on what i understand while coding and troubleshooting, the GET is get or retrieve the value of what your parameter is if its from the formtest, contact, etc. The POST is it save the transaction and then send that to be process to the thing like the web.php.

2. Why do we use @csrf in forms?
I dont really know the meaning of it because i copy the form from the formtest. But base on what i search it is used as a protective measure against third party user that are trying to steal your data the @csrf create a token that check if the user is the one who initiate that action not a third party user. 

3. What is session used for in this activity?
The session is used in this activity to store the email and the flash which contain the message of what youre trying to convey.

4. What happens if session is cleared?
If the session is clear it erase all of the stored value. 