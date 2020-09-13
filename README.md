http://localhost:8000/api/register
Fields name =  name, email, password

for login
http://localhost:8000/oauth/token

http://localhost:8000/oauth/token
[{"key":"grant_type","value":"password","description":""},{"key":"client_id","value":"2","description":""},{"key":"client_secret","value":"07wML1CJ51wpQzgBaVRPlw2dwvPEzvBDhmSvrBzk","description":""},{"key":"username","value":"pritam@gmail.com","description":""},
{"key":"password","value":"123","description":""},{"key":"scope","value":"","description":""}]

for user details get link
 http://localhost:8000/api/user
	getr data with header  like('accept', 'content-type','Authorization')

Excel Import
http://localhost:8000/api/excel_import
post field name = file (type file)


Excel Details 
http://localhost:8000/api/excel_details
post field name = file_id, file_name


for excel download
http://localhost:8000/api/excel_download/8