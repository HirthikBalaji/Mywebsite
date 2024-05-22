from flask import Flask, render_template, request, make_response

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/create_file', methods=['POST'])
def create_file():
    user_input = request.form['user_input']
    filename = 'user_input.txt'
    
    # Write user input to a text file on the server
    with open(filename, 'w') as file:
        file.write(user_input)
    
    # Create a response with the file attachment
    response = make_response(open(filename).read())
    response.headers['Content-Disposition'] = f'attachment; filename={filename}'
    return response

if __name__ == '__main__':
    app.run(debug=True)
