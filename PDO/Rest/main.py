import pymysql
from app import app
from config import mysql
from flask import jsonify
from flask import flash, request

@app.route('/create', methods=['POST'])
def create_tb_siswa():
    try:        
        _json = request.json
        _nis = _json['nis']
        _nama = _json['nama']
        _tanggal_lahir = _json['ttl']
        if _nis and _nama and _tanggal_lahir and request.method == 'POST':
            conn = mysql.connect()
            cursor = conn.cursor(pymysql.cursors.DictCursor)		
            sqlQuery = "INSERT INTO tb_siswa(nis, nama, tanggal_lahir) VALUES(%d, %s, 'YYYY-MM-DD')"
            bindData = (_nis, _nama, _tanggal_lahir)            
            cursor.execute(sqlQuery, bindData)
            conn.commit()
            respone = jsonify('Sukses Input Data Siswa!')
            respone.status_code = 200
            return respone
        else:
            return showMessage()
    except Exception as e:
        print(e)
    finally:
        cursor.close() 
        conn.close()          
     
@app.route('/tb_siswa')
def tb_siswa():
    try:
        conn = mysql.connect()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        cursor.execute("SELECT id, nis, nama, tanggal_lahir FROM tb_siswa")
        tb_siswaRows = cursor.fetchall()
        respone = jsonify(tb_siswaRows)
        respone.status_code = 200
        return respone
    except Exception as e:
        print(e)
    finally:
        cursor.close() 
        conn.close()  

@app.route('/tb_siswa/')
def tb_siswa_details(tb_siswa_id):
    try:
        conn = mysql.connect()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        cursor.execute("SELECT id, nis, nama, date, FROM tb_siswa WHERE id =%d", tb_siswa_id)
        tb_siswaRow = cursor.fetchone()
        respone = jsonify(tb_siswaRow)
        respone.status_code = 200
        return respone
    except Exception as e:
        print(e)
    finally:
        cursor.close() 
        conn.close() 

@app.route('/update', methods=['PUT'])
def update_tb_siswa():
    try:
        _json = request.json
        _id = _json['id']
        _nis = _json['nis']
        _nama = _json['nama']
        _ttl = _json['tanggal_lahir']
        if _nis and _nama and _ttl and _id and request.method == 'PUT':			
            sqlQuery = "UPDATE tb_siswa SET nis=%d, nama=%s, tanggal_lahir=DD-MM-YYYY WHERE id=%d"
            bindData = (_nis, _nama, _ttl, _id,)
            conn = mysql.connect()
            cursor = conn.cursor()
            cursor.execute(sqlQuery, bindData)
            conn.commit()
            respone = jsonify('Sukses Update Data Siswa!')
            respone.status_code = 200
            return respone
        else:
            return showMessage()
    except Exception as e:
        print(e)
    finally:
        cursor.close() 
        conn.close() 

@app.route('/delete/', methods=['DELETE'])
def delete_tb_siswa(id):
	try:
		conn = mysql.connect()
		cursor = conn.cursor()
		cursor.execute("DELETE FROM tb_siswa WHERE id =%d", (id,))
		conn.commit()
		respone = jsonify('Sukses Delete Data Siswa!')
		respone.status_code = 200
		return respone
	except Exception as e:
		print(e)
	finally:
		cursor.close() 
		conn.close()
        
       
@app.errorhandler(404)
def showMessage(error=None):
    message = {
        'status': 404,
        'message': 'Record not found: ' + request.url if request else '',
    }
    respone = jsonify(message)
    respone.status_code = 404
    return respone
        
if __name__ == "__main__":
    app.run()