# Implicit Flow
- The Implicit flow was a simplified OAuth flow previously recommended for native apps and JavaScript apps where the access token was returned immediately without an **extra authorization code** exchange step.

## Steps of Implicit flow
1. Register your applications as a client to an OAuth provider. This will create an application, register the redirect URI, as well as create a user account.
2. Generate and retain the client id and client secret. This will be used to make request to the **Authorization server**.
3. The client application will now create a URL to generate crendentials on an Authorization server and get a access_token in the response.
- The request may look something like this

![image](https://github.com/user-attachments/assets/a3ea4492-6783-477e-9460-c69d5ecb3302)

- The state parameter should be an **HMAC**, so that it isn't prone to tampering via a **MIM attack**.
- This state parameter will be used by client to ensure the response from authorization server is in fact a valid one.

4. You will now be redirected to an authorization server, where you'll be asked to enter credentials and authroize an explicit access to requested resources.
![image](https://github.com/user-attachments/assets/376792a1-37ab-43fa-8603-5aa8b24556cc)

6. Once you approve the resource request, the Authorization server will redirect you to the client.
7. It is the reaponsiblity of the client to verify the state parameter, to ensure the token is not likely tampered with.
8. Extract the access_token from the response, store it in a _secured storage_ and include it into subsequent requests to **Resource server**.
