FROM node:alpine

WORKDIR /app

COPY package.json .
RUN npm install

COPY . .

EXPOSE 41235/udp

CMD ["npm","start"]

