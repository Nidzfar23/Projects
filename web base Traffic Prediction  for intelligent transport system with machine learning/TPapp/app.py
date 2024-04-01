# import joblib
# import numpy as np
# from flask import Flask, render_template, request

# app = Flask(__name__)

# # Load the pre-trained coefficients
# model_filename = 'linear_regression_model_junction_3.joblib'
# coefficients = joblib.load(model_filename)

# @app.route('/')
# def index():
#     return render_template('index.html')

# @app.route('/predict', methods=['POST'])
# def predict():
#     # Get input data from the HTML form
#     features = [float(request.form['Year']), float(request.form['Month']),
#                 float(request.form['Date_no']), float(request.form['Hour'])]
#     # Add day indicators if needed

#     # Transform input features (if needed)
#     # ...

#     # Make a prediction
#     #prediction = np.dot(features, coefficients)
#     prediction = np.dot(features, coefficients[:4])


#     return render_template('index.html', prediction=prediction)

# if __name__ == '__main__':
#     app.run(debug=True)

import joblib
import numpy as np
from flask import Flask, render_template, request

app = Flask(__name__)

# Load the pre-trained coefficients
model_filename = 'linear_regression_model_junction_3.joblib'
coefficients = joblib.load(model_filename)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/predict', methods=['POST'])
def predict():
    # Get input data from the HTML form
    year = float(request.form['Year'])
    month = float(request.form['Month'])
    date_no = float(request.form['Date_no'])
    hour = float(request.form['Hour'])
    selected_area = request.form['Area']

    # Check if the selected area is valid (optional)
    valid_areas = ["Area 1: Crossing town Jolo", "Area 2: Crossing Indanan", "Area 3: Crossing Marteriz"]
    if selected_area not in valid_areas:
        return render_template('index.html', prediction="Invalid area selected")

    # Create input features
    features = [year, month, date_no, hour]

    # Make a prediction
    prediction = np.dot(features, coefficients[:4])

    return render_template('index.html', prediction=prediction, selected_area=selected_area)

if __name__ == '__main__':
    app.run(debug=True)

