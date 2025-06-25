export function getheadercate(){
const baseurl="http://127.0.0.1:8000/api"
return {
    getheaderCateforyData:''+baseurl+'/getheaderCateforyData',
    gethomedata:''+baseurl+'/gethomedata',
getcategorydata:''+baseurl+'/category',
getproduct:''+baseurl+'/product',

getUserData:''+baseurl+'/getUserData',
getcartdata:''+baseurl+'/getcartdata',
addtocart:''+baseurl+'/addtocart',
removecart:''+baseurl+'/removecart',
}
}

export default getheadercate;