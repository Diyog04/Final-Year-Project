<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->title2 }}</title>
    <style>
        /* General Reset */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        /* Container for the product details */
        .product-detail {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        /* Product Image */
        .product-detail img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Product Details */
        .product-detail .details {
            text-align: center;
        }

        .product-detail .details h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #222;
        }

        .product-detail .details p {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 20px;
        }

        /* Back Button */
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .back-button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .back-button:active {
            background-color: #004080;
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (min-width: 768px) {
            .product-detail {
                flex-direction: row;
                align-items: flex-start;
            }

            .product-detail img {
                max-width: 50%;
                margin-right: 20px;
                margin-bottom: 0;
            }

            .product-detail .details {
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <section>
        <div class="product-detail">
            <img src="{{ asset('storage/' . $product->image2) }}" alt="{{ $product->title2 }}">
            <div class="details">
                <h1>{{ $product->title2 }}</h1>
                <p>{{ $product->description2 }}</p>
                <!-- Back Button -->
                <a href="javascript:history.back()" class="back-button">← Back to Venues</a>
            </div>
        </div>
    </section>
</body>
</html>