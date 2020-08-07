
import keras
import pandas as pd
import numpy as np
# args


def load_model():
    regressor = keras.models.load_model(
        '/home/ahmedosama/workspace/stock/MLModel/prediction-lstm.h5')
    return regressor


def predict(regressor):
    dataset_test = pd.read_csv(
        '/home/ahmedosama/workspace/stock/MLModel/daily_AAPL.csv')
    real_stock_price = dataset_test.iloc[:, 1:2].values

    from sklearn.preprocessing import MinMaxScaler
    sc = MinMaxScaler(feature_range=(0, 1))
    testing_set_scaled = sc.fit_transform(real_stock_price)

    X_test = []
    for i in range(len(testing_set_scaled)):
        X_test.append(testing_set_scaled[i, 0])
    X_test = np.array(X_test)
    X_test = np.reshape(X_test, (X_test.shape[0], 1, 1))

    predicted_stock_price = regressor.predict(X_test)
    predicted_stock_price = sc.inverse_transform(predicted_stock_price)
    return predicted_stock_price


def main():
    modelpred = load_model()
    resultlist = predict(modelpred)

    print(resultlist[0:17])


if __name__ == "__main__":
    main()
