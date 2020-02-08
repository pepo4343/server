FROM node:alpine

WORKDIR /app

COPY package.json .
RUN npm install

COPY . .

EXPOSE 41234/udp

CMD ["npm","start"]

