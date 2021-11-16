<template>
  <b-container>
    <b-button class="m-2" v-b-modal.modal-prevent-closing>Create Purchase</b-button>
    <b-modal
        id="modal-prevent-closing"
        ref="modal"
        title="Create Purchase"
        @ok="createPurchase()"
        >
        <form ref="form" >
            <b-form-group
                label="Customer Name"
                label-for="customer-name"
                invalid-feedback="Customer Name is required"
            >
                <b-form-input
                    id="customer-name"
                    v-model="customerName"
                    required
                ></b-form-input>
            </b-form-group>

            <b-form-group
                label="Quantity"
                label-for="quantity"
                invalid-feedback="Quantity is required"
            >
                <b-form-input
                    id="quantity"
                    type="number"
                    v-model="quantity"
                    min="1"
                    required
                ></b-form-input>
            </b-form-group>
            <b-form-group
                label="Offering"
                label-for="offering"
                invalid-feedback="Offering is required"
            >
                <b-form-select 
                    id="offering"
                    v-model="offeringID" 
                    :options="offerings"
                    required
                ></b-form-select>
            </b-form-group>
        </form>
    </b-modal>
    <b-table 
      :items="purchases"
      :fields="fields"
      striped 
      hover 
    ></b-table>
  </b-container>
</template>

<script>
import api from '../../../services/api'
export default {
    name: 'Purchases',
    data() {
      return {
        fields: [
            {
                key: 'id',
                label: 'Purchase ID',
            },
            {
                key: 'offering.title',
                label: 'Offering title',
            },
            'quantity',
            {
                key: 'offering.price',
                label: 'Unit price',
            },
            {
                key: 'total',
                label: 'Total'
            }
        ],
        purchases: [],
        customerName: '',
        quantity: null,
        offeringID: null,
        offerings: [],
      }
    },
    mounted(){
        this.getPurchases()
        this.getOfferings()
    },
    methods:{
        createPurchase(){
            api.post('purchases ', {
                customerName: this.customerName,
                offeringID: this.offeringID,
                quantity: this.quantity
            })
        },
        getPurchases(){
            api.get('purchases').then(purchases => {
                this.purchases = purchases
            })
        },
        getOfferings(){
            api.get('offerings').then(offerings => {
                this.offerings = offerings.map(offering => ({value: offering.id , text: offering.title}))
            })
        }
    }
}
</script>

<style>
</style>