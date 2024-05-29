from flask import Flask, request, jsonify

app = Flask(__name__)

@app.route('/endpoint2', methods=['POST'])
def receive_zones_data():
    data = request.json
    if not data or 'data' not in data or 'total' not in data:
        return jsonify({'error': 'Invalid data'}), 400

    total = data['total']
    total_taxes = total * 0.15

    product_data = data['data']
    print(f"Received data: {product_data}")
    print(f"Total_taxes: {total_taxes}")

    return (f"Nom de produit : {product_data['nomp']}, <br>"
        f"Prix : {product_data['prix']}, <br>"
        f"Quantité : {product_data['qte']}, <br>"
        f"Prix total : {total}, <br>"
        f"Prix total + taxes : {total_taxes}")



if __name__ == '__main__':
    app.run(host='0.0.0.0', port=8000)
