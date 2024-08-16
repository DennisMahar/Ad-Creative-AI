import jwt

app_id = "APP ID from Predis.AI"
sso_key = "SSO KEY from Predis.AI"
user_id = "USER ID from Predis.AI" 

jwt_token = jwt.encode({"aud": app_id, "user_id": user_id}, sso_key, algorithm='HS256')
print(jwt_token)
