import jwt

app_id = "q2GmHILmSYxJ1GPUvOCkU03BTYSQJSgJ"
sso_key = "79f7fd0109c6439789e60fb2cf1acfb3824fba004ea64c6aa2245156e8e4f5ba"
user_id = "coffeeholic0100@gmail.com" 

# Cadangan kalau habis
# app_id = "P6AjYCtcpj5NizyB0OPa83YDW7yU2Lkr"
# sso_key = "d6fe184f7b1544eb936c3401a1f65dee8a7c8a2449e74898ab12d7ff1c775d15"
# user_id = "mahardithadenis@gmail.com" 

jwt_token = jwt.encode({"aud": app_id, "user_id": user_id}, sso_key, algorithm='HS256')
print(jwt_token)
